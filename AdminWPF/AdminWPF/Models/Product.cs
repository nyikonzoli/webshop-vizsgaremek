using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http;
using AdminWPF.Resources;

namespace AdminWPF.Models
{
    public class Product : Base
    {
        public string description { get; set; }
        public double price { get; set; }
        public string size { get; set; }
        public bool iced { get; set; }
        public bool sold { get; set; }
        public int userId { get; set; }
        public int categoryId { get; set; }
        public List<Image> images { get; set; }
        public bool isReported { get; set; }

        public async static Task<bool> delete(int id)
        {
            string url = Requests.client.BaseAddress + "products/" + id;
            Task<HttpResponseMessage> deleteTask = Requests.Delete(url);
            HttpResponseMessage response = await deleteTask;
            return true;
        }
 
        public async static Task<Product> update(ProductUpdateResource product, int id)
        {
            string url = Requests.client.BaseAddress + "products/" + id;
            Task<HttpResponseMessage> putTask = Requests.Put(url, product);
            HttpResponseMessage response = await putTask;
            string test = await response.Content.ReadAsStringAsync();
            return (await response.Content.ReadAsAsync<DataWrapper<Product>>()).data;
        }

        public async static Task<List<Product>> getProductsByUserId(int id)
        {
            string url = Requests.client.BaseAddress + "users/" + id + "/products";
            HttpResponseMessage response = await Requests.getResponse(url);
            string test = await response.Content.ReadAsStringAsync();
            return await response.Content.ReadAsAsync<List<Product>>();
        }
        public async static Task<List<Product>> getProductsByName(string name)
        {
            string url = Requests.client.BaseAddress + "products?name=" + name;
            HttpResponseMessage response = await Requests.getResponse(url);
            return await response.Content.ReadAsAsync<List<Product>>();
        }
    }
}