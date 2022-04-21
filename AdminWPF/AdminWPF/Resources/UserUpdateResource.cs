using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdminWPF.Resources
{
    class UserUpdateResource
    {
        public string name { get; set; }
        public string email { get; set; }
        public string birthdate { get; set; }
        public string address { get; set; }
        //public string ProfilePictureURI { get; set; }
        public string description { get; set; }
        //public string _method { get; set; }

        public UserUpdateResource(string name, string email, DateTime birthdate, string address, string profilePictureURI, string description)
        {
            this.name = name;
            this.email = email;
            this.birthdate = birthdate.Year.ToString() + "-" + birthdate.Month.ToString() + "-" + birthdate.Day.ToString() ;
            this.address = address;
            //ProfilePictureURI = profilePictureURI;
            this.description = description;
            //_method = "PUT";
        }
    }
}
