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
using AdminWPF.Resources;

namespace AdminWPF
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow(string token, string email)
        {
            BaseResource.adminEmail = email;
            BaseResource.token = token;
            InitializeComponent();
        }

        private List<User> users;
        private User currentUser;
        private List<Category> categories;
        private Category currentCategory;

        private async void searchUser_Click(object sender, RoutedEventArgs e)
        {
            userProfileProductView.Visibility = Visibility.Hidden;
            userPanel.Visibility = Visibility.Hidden;
            dataPanel.Visibility = Visibility.Hidden;
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
                Task<List<User>> userTask = User.getUsersByName(searchText);
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
            Task<List<Product>> productTask = Product.getProductsByUserId(user.id);
            Task<List<Review>> madeReviewsTask = Review.getMadeReviews(user.id);
            Task<List<Review>> receivedReviewsTask = Review.getReceivedReviews(user.id);
            currentUser = user;
            userImage.Source = new BitmapImage(new Uri(user.ProfilePictureURI));
            userId.Content = "#" + user.id;
            isAdminLable.Content = "Admin: " + (user.IsAdmin ? "Yes" : "No");
            changeRole.Content = user.IsAdmin ? "Demote to regular user" : "Promote to admin";
            userName.Text = user.name;
            userEmail.Text = user.Email;
            userAddress.Text = user.Address;
            userDescription.Text = user.Description;
            userBirthdate.SelectedDate = user.Birthdate;
            List<Product> products = await productTask;
            List<Review> madeReviews = await madeReviewsTask;
            List<Review> receivedReviews = await receivedReviewsTask;
            userProfileProductView.setProductsList(products);
            madeReviewView.generateReview(madeReviews);
            receivedReviewView.generateReview(receivedReviews);
            dataPanel.Visibility = Visibility.Visible;
            userPanel.Visibility = Visibility.Visible;
            userProfileProductView.Visibility = Visibility.Visible;
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
            Task<User> userTask = User.update(helper, currentUser.id);
            User user = await userTask;
            currentUser = user;
            setUserProfile(user);
            MessageBox.Show(user.name + "'s profile has been updated successfully!");
        }

        private async void categoriesExpander_Expanded(object sender, RoutedEventArgs e)
        {
            categoryDataPanel.Visibility = Visibility.Hidden;
            categoryEditPanel.Visibility = Visibility.Hidden;
            await updateCategoryRefreshComboBox();
        }

        private async Task<int> updateCategoryRefreshComboBox()
        {
            Task<List<Category>> categoriesTask = Category.getAllCategories();
            categories = await categoriesTask;
            categoriesCB.Items.Clear();
            foreach (var category in categories)
            {
                categoriesCB.Items.Add(category.name);
            }
            categoryEditPanel.Visibility = Visibility.Visible;
            return 0;
        }

        private void createCategoryExpander_Expanded(object sender, RoutedEventArgs e)
        {

        }

        private void categoriesCB_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            if(categoriesCB.Items.Count > 0)
            {
                Category category = categories.Where(x => x.name == categoriesCB.SelectedItem.ToString()).First();
                currentCategory = category;
                categoryId.Content = "Id: #" + category.id;
                categoryName.Text = category.name;
                categoryDataPanel.Visibility = Visibility.Visible;
            }
        }

        private async void searchProductByName_Click(object sender, RoutedEventArgs e)
        {
            if(productNameTB.Text.Length > 0)
            {
                ProductTabProductView.Visibility = Visibility.Hidden;
                Task<List<Product>> productsTask = Product.getProductsByName(productNameTB.Text);
                List<Product> productsByName = await productsTask;
                ProductTabProductView.setProductsList(productsByName);
                ProductTabProductView.Visibility = Visibility.Visible;
            }
        }

        private void deleteUserImage_Click(object sender, RoutedEventArgs e)
        {
            MessageBoxResult dr = MessageBox.Show("Are you sure that you want to delete " + currentUser.name + "'s profile picture? (You will still have to update the profile completly delete the image!)", "Delete Profile Picture", MessageBoxButton.YesNo);
            if(dr == MessageBoxResult.Yes)
            {
                userImage.Source = null;
                currentUser.ProfilePictureURI = null;
            }
        }

        private async void createCategoryButton_Click(object sender, RoutedEventArgs e)
        {
            if(newCategoryName.Text.Length > 0)
            {
                CategoryResource helper = new CategoryResource();
                helper.name = newCategoryName.Text;
                Task<Category> categoryTask = Category.postCategory(helper);
                Category category = await categoryTask;
                MessageBox.Show(category.name + " category has been created!");
                await updateCategoryRefreshComboBox();
            }
        }

        private async void updateCategory_Click(object sender, RoutedEventArgs e)
        {
            if (categoryName.Text.Length > 0)
            {
                CategoryResource helper = new CategoryResource();
                helper.name = categoryName.Text;
                Task<Category> categoryTask = Category.updateCategory(helper, currentCategory.id);
                currentCategory = await categoryTask;
                MessageBox.Show(currentCategory.name + " category has been updated!");
                await updateCategoryRefreshComboBox();
                categoriesCB.SelectedItem = currentCategory.name;
            }
        }

        private async void deletCategory_Click(object sender, RoutedEventArgs e)
        {
            MessageBoxResult dr = MessageBox.Show("Are you sure that you want to delete the " + currentCategory.name + " category?", "Delete Category", MessageBoxButton.YesNo);
            if (dr == MessageBoxResult.Yes)
            {
                Task<bool> deleteTask = Category.deleteCategory(currentCategory.id);
                bool result = await deleteTask;
                if (result == true)
                {
                    MessageBox.Show(currentCategory.name + " category has been deleted!");
                    categoryDataPanel.Visibility = Visibility.Hidden;
                    await updateCategoryRefreshComboBox();
                }
            }
        }

        private async void deleteUser_Click(object sender, RoutedEventArgs e)
        {
            MessageBoxResult dr = MessageBox.Show("Are you sure that you want to delete " + currentUser.name + "?", "Delete User", MessageBoxButton.YesNo);
            if (dr == MessageBoxResult.Yes)
            {
                Task<bool> deleteTask = User.deleteUser(currentUser.id);
                bool result = await deleteTask;
                if (result == true)
                {
                    MessageBox.Show(currentUser.name + "'s profile has been deleted!");
                    userProfileProductView.Visibility = Visibility.Hidden;
                    userPanel.Visibility = Visibility.Hidden;
                    dataPanel.Visibility = Visibility.Hidden;
                }
            }
        }

        private async void changeRole_Click(object sender, RoutedEventArgs e)
        {
            changeRole.IsEnabled = false;
            if (!currentUser.IsAdmin)
            {
                MessageBoxResult dr = MessageBox.Show("Are you sure that you want to promote " + currentUser.name + " to admin?", "Promote User", MessageBoxButton.YesNo);
                if (dr == MessageBoxResult.Yes)
                {
                    Task<bool> promoteTask = User.promoteToAdmin(currentUser.id);
                    bool result = await promoteTask;
                    if (result == true)
                    {
                        MessageBox.Show(currentUser.name + "'s profile has been promoted!");
                        currentUser.IsAdmin = true;
                        isAdminLable.Content = "Admin: Yes";
                        changeRole.Content = "Demote to regular user";
                    }
                }
            }
            else
            {
                MessageBoxResult dr = MessageBox.Show("Are you sure that you want to demote " + currentUser.name + " to a regular user?", "Demote User", MessageBoxButton.YesNo);
                if (dr == MessageBoxResult.Yes)
                {
                    Task<bool> demoteTask = User.demoteToRegular(currentUser.id);
                    bool result = await demoteTask;
                    if (result == true)
                    {
                        MessageBox.Show(currentUser.name + "'s profile has been demoted!");
                        currentUser.IsAdmin = true;
                        isAdminLable.Content = "Admin: No";
                        changeRole.Content = "Promote to admin";
                    }
                }
            }
            changeRole.IsEnabled = true;
        }

        private string prevoiusReportRequest;
        private async void searchReport_Click(object sender, RoutedEventArgs e)
        {
            string parameters = "?types=";
            if ((bool)reportConversation.IsChecked) parameters += "conversation;";
            if ((bool)reportProduct.IsChecked) parameters += "product;";
            if ((bool)reportReview.IsChecked) parameters += "review";
            parameters += "&getBy=";
            if ((bool)reportNameRadio.IsChecked) parameters += "name";
            else if ((bool)reportIdRadio.IsChecked) parameters += "id";
            else if ((bool)reportAllRadio.IsChecked) parameters += "all";
            if (reportSearch.Text.Length > 0) parameters += "&keyword=" + reportSearch.Text;
            else parameters += "&keyword=null";
            prevoiusReportRequest = parameters;
            Task<List<Report>> reportTask = Report.getReports(parameters);
            List<Report> reports = await reportTask;
            reportList.Items.Clear();
            foreach (var report in reports)
            {
                reportList.Items.Add(report);
            }
        }

        private async void deleteReport_Click(object sender, RoutedEventArgs e)
        {
            Report reportdata = (sender as Button).DataContext as Report;
            Task<bool> deleteTask = Report.deleteReport(reportdata.id);
            bool result = await deleteTask;
            Task<List<Report>> reportTask = Report.getReports(prevoiusReportRequest);
            MessageBox.Show("The report has been deleted!");
            List<Report> reports = await reportTask;
            reportList.Items.Clear();
            foreach (var report in reports)
            {
                reportList.Items.Add(report);
            }
        }
    }
}
