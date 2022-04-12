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

        public async void update()
        {
            string json = JsonSerializer.Serialize(this);
        }

        public async static Task<User> getUserById(string id)
        {
            string url = Requests.client.BaseAddress + "api/users/" + id;
            Task<HttpResponseMessage> getTask = Requests.Get(url);
            HttpResponseMessage response = await getTask;
            if (response == null) throw new Exception("User not found! 404");
            return (await response.Content.ReadAsAsync<DataWrapper<User>>()).data;
        }

        public async static Task<List<User>> getUserByName(string name)
        {
            string url = Requests.client.BaseAddress + "api/users?name=" + name;
            Task<HttpResponseMessage> getTask = Requests.Get(url);
            HttpResponseMessage response = await getTask;
            if (response == null) throw new Exception("User not found! 404");
            return await response.Content.ReadAsAsync<List<User>>();
        }
    }
}
