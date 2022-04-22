using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdminWPF.Models
{
    public class Image
    {
        public int Id { get; set; }
        public int ProductId { get; set; }
        public string ImageURI { get; set; }
    }
}
