using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using AdminWPF.Models;

namespace AdminWPF.Resources
{
    public class ProductUpdateResource
    {
        public string name { get; set; }
        public string description { get; set; }
        public double price { get; set; }
        public string size { get; set; }
        public int categoryId { get; set; }
        public List<int> imageIds { get; set; }

        public ProductUpdateResource() { }

        public void dataFromProduct(Product product)
        {
            name = product.name;
            description = product.description;
            price = product.price;
            size = product.size;
            categoryId = product.categoryId;
        }
    }
}
