   M S B A M L   `   `   `  ����I  EGTAN_Converter, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null/clr-namespace:GTAN_ConverterGTAN_Converter  5   	       GTAN_Converter.MainWindow   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   .localclr-namespace:GTAN_Converter     5   	     � Title$  
MainWindow��5   	   $	��400��6   $	��800��6)   .��5	      �  � ColumnDefinitions 5
      �� 5      $��4* �6   �� 5      $��2* �6   �� 5      $��8* �6   .+�5      �� -   5         ��Name$ xmlText��5   �    �� AcceptsReturn . $��Courier New)�6#   $��0��6<   $��10q�6L    �� TextWrapping$
 Wrap=�6X   " �� VerticalScrollBarVisibility$
 Auto=�6l   6�   � 5      $��1��6    � RowDefinitions 5      �� 5   
   $��9* �6   �� 5   
   $��2* �6   �� 5   
   $��2* �6   �� 5   
   $��2* �6   �� 5   
   $��2* �6   �� 5   
   $��2* �6   �� 5   
   $��9* �6   .+�5      �� $��Mode:��6   $��10(�6   $��1��6,   $��Bottom=�69   �� 5      -   5         ��Name$ 	modeCombo��5   )   $��2��6   $��2q�6   .@�5   
   �� $��XML to JSON��6   �� 5    
   $��XML to CS (Create)��6   �� 5!   
   $��XML to CS (Delete)��6   5"   	   �� 5$      $��Offset:��6   $��10(�6    $��3��6.   $��Bottom=�6;   �� 5%      -   5        $ 
offsetText��5%   l   $��4��6   $��Right=�6   $��2q�6@   $��0��6K   $	��Top=�6T   6l   �� 5&      -   5        $��Convert��5&      $��5��6!   $��3q�6.   69   5'      �� 5)      -   5        $ jsonText��5)   �    . $��Courier New)�6#   $��2��6<   $��10q�6L   $
 Wrap=�6X   $
 Auto=�6l   6�   5*      5+      