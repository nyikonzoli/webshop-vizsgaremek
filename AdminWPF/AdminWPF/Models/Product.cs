using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http;

namespace AdminWPF.Models
{
    class Product : Base
    {
        public string Description { get; set; }
        public double Price { get; set; }
        public string Size { get; set; }
        public bool Iced { get; set; }
        public bool Sold { get; set; }
        public int UserId { get; set; }
        public int CategoryId { get; set; }
        public List<Image> Images { get; set; }

        public async static Task<List<Product>> getProductsByUserId(int id)
        {
            string url = Requests.client.BaseAddress + "api/users/" + id + "/products";
            Task<HttpResponseMessage> getTask = Requests.Get(url);
            HttpResponseMessage response = await getTask;
            return await response.Content.ReadAsAsync<List<Product>>();
        }
    }
}