using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;
using AdminWPF.Resources;

namespace AdminWPF.Models
{
    class Category : Base
    {
        public static async Task<List<Category>> getAllCategories()
        {
            string url = Requests.client.BaseAddress + "categories";
            Task<HttpResponseMessage> getTask = Requests.Get(url);
            HttpResponseMessage response = await getTask;
            return await response.Content.ReadAsAsync<List<Category>>();
        }

        public static async Task<Category> postCategory(CategoryResource resource)
        {
            string url = Requests.client.BaseAddress + "categories";
            Task<HttpResponseMessage> postTask = Requests.Post(url, resource);
            HttpResponseMessage response = await postTask;
            return await response.Content.ReadAsAsync<Category>();
        }

        public static async Task<Category> updateCategory(CategoryResource resource, int id)
        {
            string url = Requests.client.BaseAddress + "categories/" + id;
            Task<HttpResponseMessage> putTask = Requests.Put(url, resource);
            HttpResponseMessage response = await putTask;
            return await response.Content.ReadAsAsync<Category>();
        }

        public static async Task<bool> deleteCategory(int id) 
        {
            string url = Requests.client.BaseAddress + "categories/" + id;
            Task<HttpResponseMessage> deleteTask = Requests.Delete(url);
            HttpResponseMessage response = await deleteTask;
            return true;
        }
    }
}
