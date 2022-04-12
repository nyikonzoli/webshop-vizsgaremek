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
        }

        private List<User> users;
        private User currentUser;

        private async void searchUser_Click(object sender, RoutedEventArgs e)
        {
            string searchText = userSearch.Text;
            if (searchText.Length > 0 && userIdRadio.IsChecked == true)
            {
                var userTask = User.getUserById(searchText);
                userListStack.Visibility = Visibility.Hidden;
                userListStack.Height = 0;
                User user = await userTask;
                setUserProfile(user);
            }
            else if(searchText.Length > 0 && userNameRadio.IsChecked == true)
            {
                var userTask = User.getUserByName(searchText);
                userPanel.Visibility = Visibility.Hidden;
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
            var user = (sender as ListView).SelectedItem as User;
            setUserProfile(user);
        }

        private void setUserProfile(User user)
        {
            currentUser = user;
            userImage.Source = new BitmapImage(new Uri(user.ProfilePictureURI));
            userId.Content = "#" + user.Id;
            userName.Text = user.Name;
            userEmail.Text = user.Email;
            userAddress.Text = user.Address;
            userDescription.Text = user.Description;
            userBirthdate.SelectedDate = user.Birthdate;
            userPanel.Visibility = Visibility.Visible;
        }

        private void updateUser_Click(object sender, RoutedEventArgs e)
        {
            currentUser.update();
        }
    }
}
