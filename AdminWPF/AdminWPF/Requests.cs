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

        public async static Task<HttpResponseMessage> Put(string url, Dictionary<string, string> parameters)
        {
            FormUrlEncodedContent encodedContent = new FormUrlEncodedContent(parameters);
            HttpResponseMessage response = await client.PutAsync(url, encodedContent);
            response.EnsureSuccessStatusCode();
            return response;
        }
    }
}
