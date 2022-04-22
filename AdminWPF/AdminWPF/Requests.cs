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
            response.EnsureSuccessStatusCode();
            return response;
        }

        public async static Task<HttpResponseMessage> Put(string url, object obj)
        {
            HttpResponseMessage response = await client.PutAsync(url, getContent(obj));
            response.EnsureSuccessStatusCode();
            return response;
        }

        public async static Task<HttpResponseMessage> Post(string url, object obj)
        {
            HttpResponseMessage response = await client.PostAsync(url, getContent(obj));
            response.EnsureSuccessStatusCode();
            return response;
        }

        public async static Task<HttpResponseMessage> Delete(string url)
        {
            HttpResponseMessage response = await client.DeleteAsync(url);
            response.EnsureSuccessStatusCode();
            return response;
        }

        private static ByteArrayContent getContent(object obj)
        {
            string myContent = JsonConvert.SerializeObject(obj);
            ByteArrayContent strcnt = new StringContent(myContent);
            strcnt.Headers.ContentType = new MediaTypeHeaderValue("application/json");
            return strcnt;
        }

        public async static Task<HttpResponseMessage> getResponse(string url)
        {
            Task<HttpResponseMessage> getTask = Get(url);
            return await getTask;
        }
    }
}
