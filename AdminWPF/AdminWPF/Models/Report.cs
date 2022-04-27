using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http;

namespace AdminWPF.Models
{
    class Report
    {
        public int id { get; set; }
        public int senderId { get; set; }
        public string senderName { get; set; }
        public int receiverId { get; set; }
        public string receiverName { get; set; }
        public string type { get; set; }
        public int objectId { get; set; }
        public string objectName { get; set; }

        public static async Task<List<Report>> getReports(string parameters)
        {
            string url = Requests.client.BaseAddress + "reports" + parameters;
            HttpResponseMessage response = await Requests.getResponse(url);
            return await response.Content.ReadAsAsync<List<Report>>();
        }
    }
}
