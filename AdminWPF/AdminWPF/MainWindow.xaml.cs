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
        }

        private async void searchUser_Click(object sender, RoutedEventArgs e)
        {
            string searchText = userSearch.Text;
            if (searchText.Length > 0 && userIdRadio.IsChecked == true)
            {
                var userTask = User.getUserById(searchText);
                User user = await userTask;
                userImage.Source = new BitmapImage(new Uri(user.ProfilePictureURI));
                userId.Content = "#" + user.Id;
                userName.Text = user.Name;
                userEmail.Text = user.Email;
                userAddress.Text = user.Address;
                userDescription.Text = user.Description;
                userBirthdate.SelectedDate = user.Birthdate;
                userPanel.Visibility = Visibility.Visible;
            }
            else if(searchText.Length > 0 && userNameRadio.IsChecked == true)
            {
                var userTask = User.getUserByName(searchText);
                List<User> users = await userTask;
                foreach (var user in users)
                {
                    userList.Items.Add(user);
                }
                userListStack.Visibility = Visibility.Visible;
                userListStack.Height = 150;
            }
        }
    }
}
