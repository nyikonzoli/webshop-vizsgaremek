using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace AdminWPF.Models
{
    class Category : Base
    {
        public static async Task<List<Category>> getAllCategories()
        {
            string url = Requests.client.BaseAddress + "api/categories";
            Task<HttpResponseMessage> getTask = Requests.Get(url);
            HttpResponseMessage response = await getTask;
            return await response.Content.ReadAsAsync<List<Category>>();
        }
    }
}
