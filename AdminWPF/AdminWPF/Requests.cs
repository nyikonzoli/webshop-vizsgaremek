using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http;

namespace AdminWPF
{
    sealed class Requests
    {
        public static HttpClient client;

        public async static Task<HttpResponseMessage> Get(string url)
        {
            HttpResponseMessage response = await client.GetAsync(url);
            if (response.IsSuccessStatusCode) return response;
            else return null;
        }
    }
}
