using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdminWPF.Resources
{
    class ProductUpdateResource
    {
        public string name { get; set; }
        public string description { get; set; }
        public double price { get; set; }
        public int categoryId { get; set; }
        public List<int> imageIds { get; set; }

        public ProductUpdateResource(string name_, string description_, double price_, int categoryId_, List<int> imageIds_)
        {
            name = name_;
            description = description_;
            price = price_;
            categoryId = categoryId_;
            imageIds = imageIds_;
        }
    }
}
