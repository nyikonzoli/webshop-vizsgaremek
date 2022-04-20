using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdminWPF.Models
{
    class UserUpdateResource
    {
        public string Name { get; set; }
        public string Email { get; set; }
        public DateTime Birthdate { get; set; }
        public string Address { get; set; }
        public string ProfilePictureURI { get; set; }
        public string Description { get; set; }
        public string _method { get; set; }

        public UserUpdateResource(string name, string email, DateTime birthdate, string address, string profilePictureURI, string description)
        {
            Name = name;
            Email = email;
            Birthdate = birthdate;
            Address = address;
            ProfilePictureURI = profilePictureURI;
            Description = description;
            _method = "PUT";
        }

        public Dictionary<string, string> getParams()
        {
            return new Dictionary<string, string>
            {
                {"name",  Name},
                {"email", Email },
                {"birthdate", Birthdate.ToString() },
                {"address", Address},
                {"profile_picture", ProfilePictureURI },
                {"description", Description },
            };
        }
    }
}
