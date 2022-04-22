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
    /// Interaction logic for ReviewView.xaml
    /// </summary>
    public partial class ReviewView : UserControl
    {
        public ReviewView()
        {
            InitializeComponent();
        }

        public void generateReview(List<Review> reviews)
        {
            reviewsPanel.Children.Clear();
            foreach (var review in reviews)
            {
                ReviewCatd card = new ReviewCatd();
                card.setData(review);
                card.Margin = new Thickness(20, 20, 20, 20); 
                reviewsPanel.Children.Add(card);
            }
        }
    }
}
