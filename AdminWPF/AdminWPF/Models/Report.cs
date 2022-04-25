using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdminWPF.Models
{
    class Report
    {
        public int id { get; set; }
        public int userId { get; set; }
        public string userName { get; set; }
        public string type { get; set; }
        public int objectId { get; set; }
        public string objectName { get; set; }
    }
}
