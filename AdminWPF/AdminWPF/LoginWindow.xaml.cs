using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using AdminWPF.Models;
using AdminWPF.Responses;

namespace AdminWPF
{
    /// <summary>
    /// Interaction logic for LoginWindow.xaml
    /// </summary>
    public partial class LoginWindow : Window
    {
        public LoginWindow()
        {
            InitializeComponent();
            Requests.client = new HttpClient();
            Requests.client.BaseAddress = new Uri("http://localhost:8881/api/admin/");
            Requests.client.DefaultRequestHeaders.Accept.Clear();
            Requests.client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));
        }

        private async void login_Click(object sender, RoutedEventArgs e)
        {
            if(adminEmail.Text.Length > 0 && adminPassword.Password.Length > 0)
            {
                Task<LoginResponse> loginTask = loginAdmin(adminEmail.Text, adminPassword.Password);
                LoginResponse response = await loginTask;
                if (response.status == "success")
                {
                    MainWindow main = new MainWindow(response.token);
                    main.Show();
                    this.Close();
                }
                else MessageBox.Show("The email or the password is incorrect!");
            }
        }

        private async static Task<LoginResponse> loginAdmin(string email, string password)
        {
            string url = Requests.client.BaseAddress + "login";
            LoginData resource = new LoginData(email, password);
            Task<HttpResponseMessage> postTask = Requests.Post(url, resource);
            HttpResponseMessage response = await postTask;
            string test = await response.Content.ReadAsStringAsync();
            return await response.Content.ReadAsAsync<LoginResponse>();
        }
    }
}
