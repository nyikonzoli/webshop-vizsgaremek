using System;
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
            if (response == null) throw new Exception("Use not found! 404");
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
    }
}
