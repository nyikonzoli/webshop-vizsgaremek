using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http;
using Newtonsoft.Json.Linq;

namespace AdminWPF.Models
{
    class Base
    {
        public int Id { get; set; }
        public string Name { get; set; }

        public static readonly string BaseURL = "http://localhost:8881/";

        public Base(int id, string name)
        {
            Id = id;
            Name = name;
        }

        public async static Task<JObject> GetRequest(string url)
        {
            using (HttpClient client = new HttpClient())
            {
                using (HttpResponseMessage res = await client.GetAsync(url))
                {
                    using (HttpContent content = res.Content)
                    {
                        string data = await content.ReadAsStringAsync();
                        if (data != null) return JObject.Parse(data);
                        else return null;
                    }
                }
            }
        }
    }
}
