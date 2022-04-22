using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using AdminWPF.Models;

namespace AdminWPF
{
    /// <summary>
    /// Interaction logic for ReviewCatd.xaml
    /// </summary>
    public partial class ReviewCatd : UserControl
    {
        private Review currentReview;

        public ReviewCatd()
        {
            InitializeComponent();
        }

        public void setData(Review review)
        {
            currentReview = review;
            reviewId.Content = "ID: #" + review.id;
            fromTo.Content = "From " + review.buyerName + "(#" + review.buyerId + ") of " + review.sellerName + "(#" + review.sellerId + ")";
            reviewContent.Content = review.content;
            reviewRating.Content = "Rating: " + review.rating + "/5";
        }

        private async void deleteReview_Click(object sender, RoutedEventArgs e)
        {
            MessageBoxResult dr = MessageBox.Show("Are you sure that you want to delete " + currentReview.buyerName + "'s review of " + currentReview.sellerName + "?", "Delete Review", MessageBoxButton.YesNo);
            if (dr == MessageBoxResult.Yes)
            {
                Task<bool> deleteTask = Review.delete(currentReview.id);
                bool result = await deleteTask;
                if (result == true)
                {
                    MessageBox.Show(currentReview.buyerName + "'s review has been deleted!");
                    this.Visibility = Visibility.Collapsed;
                }
            }
        }
    }
}
