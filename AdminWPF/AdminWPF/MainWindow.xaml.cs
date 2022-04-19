using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using AdminWPF.Models;
using System.Net.Http;
using System.Net.Http.Headers;

namespace AdminWPF
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
            Requests.client = new HttpClient();
            Requests.client.BaseAddress = new Uri("http://localhost:8881/");
            Requests.client.DefaultRequestHeaders.Accept.Clear();
            Requests.client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));
            imageLeft.Content = "<";
            imageRight.Content = ">";
        }

        private List<User> users;
        private User currentUser;
        private List<Category> categories;
        private List<Product> products;
        private Product currentProduct;
        private int currentImageIndex;

        private async void searchUser_Click(object sender, RoutedEventArgs e)
        {
            productPanel.Visibility = Visibility.Hidden;
            userPanel.Visibility = Visibility.Hidden;
            dataPanel.Visibility = Visibility.Hidden;
            productList.Items.Clear();
            string searchText = userSearch.Text;
            if (searchText.Length > 0 && userIdRadio.IsChecked == true)
            {
                Task<User> userTask = User.getUserById(searchText);
                userListStack.Visibility = Visibility.Hidden;
                userListStack.Height = 0;
                User user = await userTask;
                setUserProfile(user);
            }
            else if(searchText.Length > 0 && userNameRadio.IsChecked == true)
            {
                userList.Items.Clear();
                Task<List<User>> userTask = User.getUserByName(searchText);
                users = await userTask;
                foreach (var user in users)
                {
                    userList.Items.Add(user);
                }
                userListStack.Visibility = Visibility.Visible;
                userListStack.Height = 150;
            }
        }
        private void userList_MouseLeftButtonUp(object sender, MouseButtonEventArgs e)
        {
            User user = (sender as ListView).SelectedItem as User;
            setUserProfile(user);
        }

        private async void setUserProfile(User user)
        {
            Task<List<Product>> productTask = Product.getProductsByUserId(user.Id);
            Task<List<Category>> categoryTask = Category.getAllCategories();
            currentUser = user;
            userImage.Source = new BitmapImage(new Uri(user.ProfilePictureURI));
            userId.Content = "#" + user.Id;
            userName.Text = user.Name;
            userEmail.Text = user.Email;
            userAddress.Text = user.Address;
            userDescription.Text = user.Description;
            userBirthdate.SelectedDate = user.Birthdate;
            categories = await categoryTask;
            productCategory.Items.Clear();
            foreach (var category in categories)
            {
                productCategory.Items.Add(category.Name);
            }
            products = await productTask;
            foreach (var product in products)
            {
                productList.Items.Add(product);
            }
            dataPanel.Visibility = Visibility.Visible;
            userPanel.Visibility = Visibility.Visible;
        }

        private void setProductData(Product product)
        {
            currentProduct = product;
            productId.Content = "#" + product.Id;
            productName.Text = product.Name;
            productDescription.Text = product.Description;
            productPrice.Text = product.Price.ToString() + "$";
            productSizee.Text = product.Size;
            productIced.Content = "Iced: " + product.Iced.ToString();
            productSold.Content = "Sold: " + product.Sold.ToString();
            productUserId.Content = "#" + product.UserId.ToString();
            productCategory.SelectedItem = categories.Where(x => x.Id == product.CategoryId).First().Name;
            productImage.Source = new BitmapImage(new Uri(product.Images[0].ImageURI));
            currentImageIndex = 0;
            productPanel.Visibility = Visibility.Visible;
        }

        private async void updateUser_Click(object sender, RoutedEventArgs e)
        {
            UserUpdateResource helper = new UserUpdateResource(
                name: userName.Text,
                email: userEmail.Text,
                birthdate: (DateTime)userBirthdate.SelectedDate,
                address: userAddress.Text,
                profilePictureURI: currentUser.ProfilePictureURI,
                description: userDescription.Text
            );
            Task<User> userTask = User.update(helper, currentUser.Id);
            User user = await userTask;
            setUserProfile(user);
            MessageBox.Show(user.Name + "'s profile has been updated successfully!");
        }

        private void updateProduct_Click(object sender, RoutedEventArgs e)
        {

        }

        private void productList_MouseLeftButtonUp(object sender, MouseButtonEventArgs e)
        {
            Product product = (sender as ListView).SelectedItem as Product;
            setProductData(product);
        }

        private void imageLeft_Click(object sender, RoutedEventArgs e)
        {
            if(currentImageIndex != 0)
            {
                productImage.Source = new BitmapImage(new Uri(currentProduct.Images[--currentImageIndex].ImageURI));
            }
        }

        private void imageRight_Click(object sender, RoutedEventArgs e)
        {
            if(currentImageIndex != currentProduct.Images.Count - 1)
            {
                productImage.Source = new BitmapImage(new Uri(currentProduct.Images[++currentImageIndex].ImageURI));
            }
        }

        private async void categoriesExpander_Expanded(object sender, RoutedEventArgs e)
        {
            categoryDataPanel.Visibility = Visibility.Hidden;
            categoryEditPanel.Visibility = Visibility.Hidden;
            Task<List<Category>> categoriesTask = Category.getAllCategories();
            categories = await categoriesTask;
            categoriesCB.Items.Clear();
            foreach (var category in categories)
            {
                categoriesCB.Items.Add(category.Name);
            }
            categoryEditPanel.Visibility = Visibility.Visible;
        }

        private void createCategoryExpander_Expanded(object sender, RoutedEventArgs e)
        {

        }

        private void categoriesCB_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            if(categoriesCB.Items.Count > 0)
            {
                Category category = categories.Where(x => x.Name == categoriesCB.SelectedItem.ToString()).First();
                categoryId.Content = "Id: #" + category.Id;
                categoryName.Text = category.Name;
                categoryDataPanel.Visibility = Visibility.Visible;
            }
        }
    }
}
