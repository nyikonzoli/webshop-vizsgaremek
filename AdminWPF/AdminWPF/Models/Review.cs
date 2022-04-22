using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http;

namespace AdminWPF.Models
{
    public class Review
    {
        public int id { get; set; }
        public int sellerId { get; set; }
        public string sellerName { get; set; }
        public int buyerId { get; set; }
        public string buyerName { get; set; }
        public string content { get; set; }
        public int rating { get; set; }

        public async static Task<bool> delete(int id)
        {
            string url = Requests.client.BaseAddress + "reviews/" + id;
            Task<HttpResponseMessage> deleteTask = Requests.Delete(url);
            HttpResponseMessage response = await deleteTask;
            return true;
        }

        public async static Task<List<Review>> getReceivedReviews(int userId)
        {
            string url = Requests.client.BaseAddress + "users/" + userId + "/reviews/received";
            HttpResponseMessage response = await Requests.getResponse(url);
            return await response.Content.ReadAsAsync<List<Review>>();
        }

        public async static Task<List<Review>> getMadeReviews(int userId)
        {
            string url = Requests.client.BaseAddress + "users/" + userId + "/reviews/made";
            HttpResponseMessage response = await Requests.getResponse(url);
            return await response.Content.ReadAsAsync<List<Review>>();
        }
    }
}
