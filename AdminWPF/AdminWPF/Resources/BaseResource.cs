using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdminWPF.Resources
{
    class BaseResource
    {
        public static string adminEmail { get; set; }
        public static string token { get; set; }

        public static string getParams()
        {
            return "?adminEmail=" + adminEmail + "&token=" + token;
        }
    }
}
