using System;
using System.Collections.Generic;
using System.Threading.Tasks;
using Newtonsoft.Json.Linq;
using System.Text.Json;
using System.Text.Json.Serialization;
using System.Net.Http;

namespace AdminWPF.Models
{
    class User : Base
    {
        public string Email { get; set; }
        public DateTime Birthdate { get; set; }
        public string Address { get; set; }
        public string ProfilePictureURI { get; set; }
        public string Description { get; set; }

        public async static Task<User> update(UserUpdateResource user, int id)
        {
            string url = Requests.client.BaseAddress + "api/users/" + id;
            DataWrapper<UserUpdateResource> dw = new DataWrapper<UserUpdateResource>();
            dw.data = user;
            Task<HttpResponseMessage> putTask = Requests.Put(url, dw);
            HttpResponseMessage response = await putTask;
            return (await response.Content.ReadAsAsync<DataWrapper<User>>()).data;
        }

        public async static Task<User> getUserById(string id)
        {
            string url = Requests.client.BaseAddress + "api/users/" + id;
            HttpResponseMessage response = await getResponse(url);
            return (await response.Content.ReadAsAsync<DataWrapper<User>>()).data;
        }

        public async static Task<List<User>> getUserByName(string name)
        {
            string url = Requests.client.BaseAddress + "api/users?name=" + name;
            HttpResponseMessage response = await getResponse(url);
            return await response.Content.ReadAsAsync<List<User>>();
        }

        private async static Task<HttpResponseMessage> getResponse(string url)
        {
            Task<HttpResponseMessage> getTask = Requests.Get(url);
            return await getTask;
        }
    }
}
