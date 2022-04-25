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
using AdminWPF.Resources;
using AdminWPF.Models;

namespace AdminWPF
{
    /// <summary>
    /// Interaction logic for ProductView.xaml
    /// </summary>
    public partial class ProductView : UserControl
    {
        private ProductUpdateResource productResource;
        private List<Category> categories;
        private Product currentProduct;
        private int currentImageIndex;

        public string ProductName
        {
            set
            {
                productResource.name = value;
            }
        }
        public string Description
        {
            set
            {
                productResource.description = value;
            }
        }
        public string Price
        {
            set
            {
                try
                {
                    productResource.price = Convert.ToDouble(value);
                    priceError.Visibility = Visibility.Hidden;
                }
                catch (Exception)
                {
                    priceError.Visibility = Visibility.Visible;    
                }   
            }
        }
        public string Size
        {
            set
            {
                productResource.size = value;
            }
        }
        public string CategoryId
        {
            set
            {
                try
                {
                    productResource.categoryId = categories.Where(x => x.name == value).First().id;
                }
                catch (Exception) { }

            }
        }

        public ProductView()
        {
            InitializeComponent();
            productResource = new ProductUpdateResource();
            DataContext = this;
            imageLeft.Content = "<";
            imageRight.Content = ">";
        }

        public void setProductsList(List<Product> products)
        {
            productList.Items.Clear();
            productPanel.Visibility = Visibility.Collapsed;
            foreach (var product in products)
            {
                productList.Items.Add(product);
            }
        }

        public async void setProductData(Product product)
        {
            await getCategories();
            currentProduct = product;
            productResource.dataFromProduct(product);
            productId.Content = "#" + product.id;
            reportLabel.Visibility = product.isReported ? Visibility.Visible : Visibility.Collapsed;
            productName.Text = product.name;
            productDescription.Text = product.description;
            productPrice.Text = product.price.ToString();
            productSizee.Text = product.size;
            productIced.Content = "Iced: " + product.iced.ToString();
            productSold.Content = "Sold: " + product.sold.ToString();
            productUserId.Content = "User ID: #" + product.userId.ToString();
            productCategory.SelectedItem = categories.Where(x => x.id == product.categoryId).First().name;
            if(product.images.Count > 0) productImage.Source = new BitmapImage(new Uri(product.images[0].ImageURI));
            currentImageIndex = 0;
            productPanel.Visibility = Visibility.Visible;
        }

        public async Task<int> getCategories()
        {
            Task<List<Category>> catgeoriesTask = Category.getAllCategories();
            categories = await catgeoriesTask;
            productCategory.Items.Clear();
            foreach (var category in categories)
            {
                productCategory.Items.Add(category.name);
            }
            return 0;
        }

        private void imageLeft_Click(object sender, RoutedEventArgs e)
        {
            if (currentImageIndex != 0)
            {
                productImage.Source = new BitmapImage(new Uri(currentProduct.images[--currentImageIndex].ImageURI));
            }
        }

        private void imageRight_Click(object sender, RoutedEventArgs e)
        {
            if (currentImageIndex != currentProduct.images.Count - 1)
            {
                productImage.Source = new BitmapImage(new Uri(currentProduct.images[++currentImageIndex].ImageURI));
            }
        }

        private async void updateProduct_Click(object sender, RoutedEventArgs e)
        {
            List<int> ids = new List<int>();
            foreach (var image in currentProduct.images)
            {
                ids.Add(image.Id);
            }
            productResource.imageIds = ids;
            Task<Product> productTask = Product.update(productResource, currentProduct.id);
            Product product = await productTask;
            currentProduct = product;
            setProductData(product);
            MessageBox.Show(product.name + " has been updated");
        }

        private void productList_MouseLeftButtonUp(object sender, MouseButtonEventArgs e)
        {
            productPanel.Visibility = Visibility.Collapsed;
            Product product = (sender as ListView).SelectedItem as Product;
            setProductData(product);
        }

        private async void deleteProduct_Click(object sender, RoutedEventArgs e)
        {
            MessageBoxResult dr = MessageBox.Show("Are you sure that you want to delete " + currentProduct.name, "Delete User", MessageBoxButton.YesNo);
            if (dr == MessageBoxResult.Yes)
            {
                Task<bool> deleteTask = Product.delete(currentProduct.id);
                bool result = await deleteTask;
                if (result == true)
                {
                    MessageBox.Show(currentProduct.name + " has been deleted!");
                    this.Visibility = Visibility.Hidden;
                }
            }
        }
    }
}
