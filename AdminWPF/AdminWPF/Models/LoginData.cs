using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdminWPF.Models
{
    class LoginData
    {
        public string email { get; set; }
        public string password { get; set; }

        public LoginData( string email_, string password_)
        {
            email = email_;
            password = password_;
        }
    }
}
