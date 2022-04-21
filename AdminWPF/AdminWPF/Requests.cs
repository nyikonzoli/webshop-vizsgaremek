using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http;
using Newtonsoft.Json;
using System.Net.Http.Headers;

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

        public async static Task<HttpResponseMessage> Put(string url, object obj)
        {
            string myContent = JsonConvert.SerializeObject(obj);
            //byte[] buffer = Encoding.UTF8.GetBytes(myContent);
            ByteArrayContent strcnt = new StringContent(myContent);
            strcnt.Headers.ContentType = new MediaTypeHeaderValue("application/json");
            HttpResponseMessage response = await client.PutAsync(url, strcnt);
            response.EnsureSuccessStatusCode();
            return response;
        }
    }
}
