using System;
using System.Collections.Generic;
using System.Threading.Tasks;
using Newtonsoft.Json.Linq;
using System.Text.Json;
using System.Text.Json.Serialization;
using System.Net.Http;
using AdminWPF.Resources;

namespace AdminWPF.Models
{
    class User : Base
    {
        public string Email { get; set; }
        public DateTime Birthdate { get; set; }
        public string Address { get; set; }
        public string ProfilePictureURI { get; set; }
        public string Description { get; set; }

        public bool IsAdmin { get; set; }

        public async static Task<bool> deleteUser(int id)
        {
            string url = Requests.client.BaseAddress + "users/" + id;
            Task<HttpResponseMessage> deleteTask = Requests.Delete(url);
            HttpResponseMessage response = await deleteTask;
            return true;
        }

        public async static Task<User> update(UserUpdateResource user, int id)
        {
            string url = Requests.client.BaseAddress + "users/" + id;
            Task<HttpResponseMessage> putTask = Requests.Put(url, user);
            HttpResponseMessage response = await putTask;
            return (await response.Content.ReadAsAsync<DataWrapper<User>>()).data;
        }

        public async static Task<User> getUserById(string id)
        {
            string url = Requests.client.BaseAddress + "users/" + id;
            HttpResponseMessage response = await Requests.getResponse(url);
            return (await response.Content.ReadAsAsync<DataWrapper<User>>()).data;
        }

        public async static Task<List<User>> getUsersByName(string name)
        {
            string url = Requests.client.BaseAddress + "users?name=" + name;
            HttpResponseMessage response = await Requests.getResponse(url);
            return await response.Content.ReadAsAsync<List<User>>();
        }

        public async static Task<bool> promoteToAdmin(int id)
        {
            string url = Requests.client.BaseAddress + "users/" + id + "/promote";
            Task<HttpResponseMessage> postTask = Requests.Post(url, null);
            HttpResponseMessage response = await postTask;
            return true;
        }

        public async static Task<bool> demoteToRegular(int id)
        {
            string url = Requests.client.BaseAddress + "users/" + id + "/demote";
            Task<HttpResponseMessage> postTask = Requests.Post(url, null);
            HttpResponseMessage response = await postTask;
            return true;
        }
    }
}
