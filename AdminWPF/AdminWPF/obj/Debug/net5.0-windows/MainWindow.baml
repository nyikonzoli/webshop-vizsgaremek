   M S B A M L   `   `   `  ����C  ?AdminWPF, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null#clr-namespace:AdminWPFAdminWPF  5   	       AdminWPF.MainWindow   5   	   \ XPresentationFramework, Version=5.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35e aSystem.Windows.Controls.Ribbon, Version=5.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089W SPresentationCore, Version=5.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=5.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35F 9http://schemas.microsoft.com/winfx/2006/xaml/presentation     5   	   R NSystem.Xaml, Version=5.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   (localclr-namespace:AdminWPF     5   	     � Title$  
MainWindow��5   	   $	��650��6   $
��1000��6)   .��5	      �� .+�5
   
   �� .@�5      �� $��Users��6   .��5      �� $	��600��6   $	��800��6,   $
��Auto=�68   .��5      �� .+�5      ��  �� Orientation$ 
Horizontal=�6%   .+�5      �� $��Seach by��6'   .��5   "   �� $ 
Horizontal=�6-   .+�5   &   	� -   5         	�Name$ userIdRadio��5   2   .��6G   Id6K   	� 5   &   -   5        $��userNameRadio��5   2   .��6G   Name6M   5   #   5      �� 5      -   5        $��
userSearch��5   >   $	��350��6&   $��26��62   6R   �� 5      -   5        $��
searchUser��5   1   $��26��6%   .��6\   Seach6c   5      �� 5      -   5        $��userListStack��5   D   $y�Hidden=�6%   $��0��69   .+�5      �� -   5        $��userList��5   H   $��2��6'   $��1��6;    �� AlternationCount$ 0��6Y    �� SelectionMode$ Single=�6n    �� View 5   "   �� 5   &   P�5   *   �� 5   .   $��Id��6=    �� DisplayMemberBinding 6I   ��  �� Path$ id��� 5   .   $
��Name��6=    6K   �� $
 name��� 5   .   $��Email��6=    6L   �� $ Email��� 5    .   $��Address��6=    6N   �� $ Address��� 5!   .   $��	Birthdate��6=    6P   �� $ 	Birthdate��� 5"   .   $��Is admin��6=    6O   �� $ IsAdmin�5$   '   5&      5'      �� 5(      -   5        $��	dataPanel��5(   %   $y�Hidden=�66   .+�5)      �� -   5         ��Name$ 	userPanel��5)   )   $y�Hidden=�6<   .+�5*   "   �� $ 
Horizontal=�6-   .+�5+   &   �� -	   5        	 ��Name$	 	userImage��5+   ,   $	��100��6?   $	��100��6K   6Z   �� 5,   &   -
   5        
 ��Name$
 deleteUserImage��5,   -   .��6d   Delete image6r   5-   #   �� 5.   "   -   5        $��userId��5.   (   68   �� 5/   "   $ 
Horizontal=�6-   .+�50   &   �� -   5        $��isAdminLable��50   ,   6B   �� 51   &   -   5        $
 
changeRole��51   -   6\   52   #   �� 53   "   $ 
Horizontal=�6-   .+�54   &   �� .��6,   Name:63   �� 55   &   -   5         ��Name$ userName��55   .   $	��200��6@   6N   56   #   �� 57   "   $ 
Horizontal=�6-   .+�58   &   �� .��6,   Email:64   �� 59   &   -   5        $ 	userEmail��59   .   $	��200��6A   6O   5:   #   �� 5;   "   $ 
Horizontal=�6-   .+�5<   &   �� .��6,   
Address:66   �� 5=   &   -   5        $ userAddress��5=   .   $	��200��6C   6Q   5>   #   �� 5?   "   $ 
Horizontal=�6-   .+�5@   &   �� .��6,   
Birthdate:68   (  "System.Windows.Controls.DatePicker  5A   &   -   5        $��userBirthdate��5A   1   6H   5B   #   �� 5C   "   $ 
Horizontal=�6-   .+�5D   &   �� .��6,   Description:6:   �� 5E   &   -   5        $ userDescription��5E   .   $	��200��6G   6U   5F   #   �� 5G   "   -   5        $
 
updateUser��5G   )   .��6V   Update6^   �� 5H   "   -   5        $
 
deleteUser��5H   )   .��6V   Delete6^   5I      9� 5J      $��Products��6'   .��5K   "   � .+�5L   &      AdminWPF.ProductView  -   5          Name$ userProfileProductView��5L   8   5M   #   5N      9� 5O      $ ��Reviews that the user made��6'   .��5P   "   � .+�5Q   &      AdminWPF.ReviewView  -   5          Name$ madeReviewView��5Q   7   5R   #   5S      9� 5T      $$��Reviews that the user received��6'   .��5U   "   � .+�5V   &     -   5        $ receivedReviewView��5V   7   5W   #   5X      5Y      5Z      5[      5\      �� 5]      $��Products��6   .��5^      �� .+�5_      �� $ 
Horizontal=�6!   .+�5`      �� .��6    Search by name:61   �� 5a      -   5        $��productNameTB��5a   0   $��300px��6"   6G   �� 5b      -   5        $
 searchProductByName��5b   !   .��6`   Search6h   5c      �� 5d      .+�5e      � .+�5f        -   5        $ ProductTabProductView��5f   0   $y�Hidden=�6O   5g      5h      5i      5j      �� 5k      $��
Categories��6   .��5l      �� .+�5m      9� -   5        $��categoriesExpander��5m   3   $��
Categories��6   .��5n      �� -   5        $��categoryEditPanel��5n   >   $ 
Horizontal=�6%   .+�5o      �� $	��150��6)   .+�5p   "   �� .��6(   
Category62   �� 5q   "   -   5        $��categoriesCB��5q   +   6r   5r      �� 5s      -   5        $ categoryDataPanel��5s   )   $��48 0 0 0q�6D   .+�5t   "   �� .+�5u   &   �� -   5        $��
categoryId��5u   ,   6@   5v   #   �� 5w   "   .+�5x   &   �� .��6,   Name62   �� 5y   &   $ 
Horizontal=�61   .+�5z   *   �� -    5        $ categoryName��5z   2   $	��250��6H   6V   �� 5{   *   -!   5        $
 updateCategory��5{   1   .��6f   Update6n   5|   '   5}   #   �� 5~   "   -"   5        $
 deletCategory��5~   )   .��6\   Delete category6m   5      5�      5�      9� 5�      -#   5        $��createCategoryExpander��5�   8   $��Create category��6   .��5�      �� $ 
Horizontal=�6%   .+�5�      �� .��6$   Name:6+   �� 5�      -$   5        $��newCategoryName��5�   2   $	��250��6&   6K   �� 5�      -%   5        $
 createCategoryButton��5�   %   .��6f   Create Category6w   5�      5�      5�      5�      �� 5�      $��Reports��6   .��5�      �� .+�5�      �� $ 
Horizontal=�6!   .+�5�      �� $��Include��6#   .��5�      �� $ 
Horizontal=�6)   .+�5�   "   �� -&   5        $��reportProduct��5�   +   $��0 0 10 0q�6@    d� 	IsChecked$
 TrueY�6R   .��6c   	Product6l   �� 5�   "   -'   5        $��reportConversation��5�   +   $��0 0 10 0q�6E   $
 TrueY�6W   .��6h   Conversation6v   �� 5�   "   -(   5        $��reportReview��5�   +   $��0 0 10 0q�6?   $
 TrueY�6Q   .��6b   Review6j   5�      5�      �� 5�      $��Seach by��6#   .��5�      �� $ 
Horizontal=�6)   .+�5�   "   	� -)   5        $ reportIdRadio��5�   .   .��6E   Id6I   	� 5�   "   -*   5        $��reportNameRadio��5�   .   .��6E   Name6K   	� 5�   "   -+   5        $��reportAllRadio��5�   .   $
 TrueY�6D   .��6U   All6Z   5�      5�      �� 5�      -,   5        $��reportSearch��5�   :   $	��350��6"   $��26��6.   6P   �� 5�      --   5        $��searchReport��5�   -   $��26��6!   .��6\   Seach6c   5�      �� 5�      -.   5        $��
reportList��5�   @   $��2��6   $��1��63   $ 0��6S   $ Single=�6h    5�      �� 5�      P�5�   "   �� 5�   &   $��Id��65    6A   �� $ id��� 5�   &   $��	Sender Id��65    6H   �� $ semderId��� 5�   &   $��Sender Name��65    6J   �� $ 
senderName��� 5�   &   $��Receiver Id��65    6J   �� $ 
receiverId��� 5�   &   $��Recevier Name��65    6L   �� $ receiverName��� 5�   &   $��	Object Id��65    6H   �� $ objectId��� 5�   &   $��Object Name��65    6J   �� $ 
objectName��� 5�   &   $��Delete��65    �� CellTemplate 5�   *   �� 5�   .   .R�5�   2   �� $��deleteReport��69   -/   5        .��5�   h   Delete6p   5�   /   5�   '   5�      5�      5�      5�      5�      5�      5�      