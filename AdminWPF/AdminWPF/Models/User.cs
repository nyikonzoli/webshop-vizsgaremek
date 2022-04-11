using System;
using System.Collections.Generic;
using System.Threading.Tasks;
using Newtonsoft.Json.Linq;

namespace AdminWPF.Models
{
    class User : Base
    {
        public string Email { get; set; }
        public DateTime Birthdate { get; set; }
        public string Address { get; set; }
        public string ProfilePictureURI { get; set; }
        public string Description { get; set; }

        public User(int id, string name, string email, DateTime birthdate, string address, string profilePictureURI, string description) : base(id, name)
        {
            Email = email;
            Birthdate = birthdate;
            Address = address;
            ProfilePictureURI = profilePictureURI;
            Description = description;
        }

        public async static Task<User> getUserById(string id)
        {
            string url = BaseURL + "api/users/" + id;
            var getTask = GetRequest(url);
            JObject response = (JObject)(await getTask)["data"];
            if (response == null) throw new Exception("User not found! 404");
            return new User(
                id: int.Parse(response["id"].ToString()),
                name: response["name"].ToString(),
                email: response["email"].ToString(),
                birthdate: DateTime.Parse(response["birthdate"].ToString()),
                address: response["address"].ToString(),
                profilePictureURI: response["profilePictureURI"].ToString(),
                description: response["description"].ToString()
            );
        }

        public async static Task<List<User>> getUserByName(string name)
        {
            string url = BaseURL + "api/users?name=" + name;
            var getTask = GetRequest(url);
            var response = await getTask;
            if (response == null) throw new Exception("User not found! 404");
            List<User> users = new List<User>();
            foreach (var user in response["data"])
            {
                users.Add(new User(
                    id: int.Parse(user["id"].ToString()),
                    name: user["name"].ToString(),
                    email: user["email"].ToString(),
                    birthdate: DateTime.Parse(user["birthdate"].ToString()),
                    address: user["address"].ToString(),
                    profilePictureURI: user["profilePictureURI"].ToString(),
                    description: user["description"].ToString()
                ));
            }
            return users;
        }
    }
}
