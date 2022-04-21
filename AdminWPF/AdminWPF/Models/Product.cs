using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http;
using AdminWPF.Resources;

namespace AdminWPF.Models
{
    class Product : Base
    {
        public string description { get; set; }
        public double price { get; set; }
        public string size { get; set; }
        public bool iced { get; set; }
        public bool sold { get; set; }
        public int userId { get; set; }
        public int categoryId { get; set; }
        public List<Image> images { get; set; }

        public async static Task<Product> update(ProductUpdateResource product, int id)
        {
            string url = Requests.client.BaseAddress + "users/" + id;
            Task<HttpResponseMessage> putTask = Requests.Put(url, product);
            HttpResponseMessage response = await putTask;
            return (await response.Content.ReadAsAsync<DataWrapper<Product>>()).data;
        }

        public async static Task<List<Product>> getProductsByUserId(int id)
        {
            string url = Requests.client.BaseAddress + "api/users/" + id + "/products";
            Task<HttpResponseMessage> getTask = Requests.Get(url);
            HttpResponseMessage response = await getTask;
            return await response.Content.ReadAsAsync<List<Product>>();
        }
    }
}