   M S B A M L   `   `   `  ����C  ?AdminWPF, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null#clr-namespace:AdminWPFAdminWPF  5          AdminWPF.ProductView   5      \ XPresentationFramework, Version=5.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35e aSystem.Windows.Controls.Ribbon, Version=5.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089W SPresentationCore, Version=5.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=5.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35F 9http://schemas.microsoft.com/winfx/2006/xaml/presentation     5      R NSystem.Xaml, Version=5.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5      Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5      @d2http://schemas.microsoft.com/expression/blend/2008     5      (localclr-namespace:AdminWPF     5      .��5	      �� .+�5
   
   �� -   5        $��productList��5
   4   $��2��6   $��1��6'     �� AlternationCount$  0��6H    �� SelectionMode$ Single=�6]    �� View 5      �� 5      P�5      �� 5      $��Id��6)    �� DisplayMemberBinding 65   ��  �� Path$ id��� 5      $
��Name��6)    67   �� $
 name��� 5      $��Price��6)    68   �� $ price��� 5      $
��Sold��6)    67   �� $
 sold��� 5      $��Reported��6)    6;   �� $ 
isReported�5      5      �� 5   
   -   5         ��Name$ productPanel��5      $y�Hidden=�6+   .+�5      ��  �� Orientation$ 
Horizontal=�6   .+�5      �� -   5        $��	imageLeft��5      6D   �� 5      -   5         ��Name$ productImage��5      $	��100��6.   $	��100��6:   6I   �� 5      -   5         ��Name$ 
imageRight��5      6H   5      �� 5      -   5        $��	productId��5      6'   �� 5      -   5        $��reportLabel��5      
���  ��.��68   !This product has been reported!6Y   �� 5      $ 
Horizontal=�6   .+�5       �� .��6   Name:6   �� 5!      -   5        	 ��Name$	 productName��5!      $	��200��6/   ��6;   �� $ ProductName�6_   5"      �� 5#      $ 
Horizontal=�6   .+�5$      �� .��6   Description:6&   �� 5%      -	   5        $	 productDescription��5%      $	��200��66   ��6B   �� $ Description�6f   5&      �� 5'      $ 
Horizontal=�6   .+�5(      �� .��6   
Price ($):6$   �� 5)      -
   5        $	 productPrice��5)      $	��200��60   ��6<   �� $ Price�6Z   �� 5*      -   5        
 ��Name$
 
priceError��5*      $y�Hidden=�6,   .��6@   &$The price must have a decimal value!6f   5+      �� 5,      $ 
Horizontal=�6   .+�5-      �� .��6   Size:6   �� 5.      -   5        $	 productSizee��5.      $	��200��60   ��6<   �� $
 Size�6Y   5/      �� 50      .+�51      �� -   5        $
 productIced��51      .��6-   Iced:64   �� 52      -   5        $
 productSold��52      .��6-   Sold:64   �� 53      -   5        $
 productUserId��53      .��6/   
User id:69   54      �� 55      $ 
Horizontal=�6   .+�56      �� .��6   	Category:6#   �� 57      -   5         ��Name$ productCategory��57       �� SelectedItem 64   �� $ 
CategoryId�6_   58      �� 59      -   5        $ updateProduct��59      .��6H   Update6P   �� 5:      -   5        $ deleteProduct��5:      .��6H   Delete6P   5;      5<      5=      