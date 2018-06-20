using System;
using System.Collections.Generic;
using System.IO;
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
using System.Xml.Serialization;

namespace GTAN_Converter
{
  /// <summary>
  /// Interaktionslogik für MainWindow.xaml
  /// </summary>
  public partial class MainWindow : Window
  {
    int offset = 0;
    String[] lines;

    public MainWindow()
    {
      InitializeComponent();
    }

    public void ConvertXMLtoJSON()
    {
      int i = 1, j = 1;
      lines = xmlText.Text.Split('\n');

      XmlSerializer xmlSerializer = new XmlSerializer(typeof(SpoonerPlacements));
      SpoonerPlacements result;
      using (TextReader reader = new StringReader(xmlText.Text))
      {
        result = (SpoonerPlacements)xmlSerializer.Deserialize(reader);
      }

      foreach (Placement item in result.Placement)
      {
        jsonText.Text += "\"" + j + "\": {\n";
        jsonText.Text += "  \"X\": " + item.PositionRotation.X.ToString().Replace(',', '.') + ",\n";
        jsonText.Text += "  \"Y\": " + item.PositionRotation.Y.ToString().Replace(',', '.') + ",\n";
        jsonText.Text += "  \"Z\": " + item.PositionRotation.Z.ToString().Replace(',', '.') + ",\n";
        jsonText.Text += "  \"Pitch\": " + item.PositionRotation.Pitch.ToString().Replace(',', '.') + ",\n";
        jsonText.Text += "  \"Roll\": " + item.PositionRotation.Roll.ToString().Replace(',', '.') + ",\n";
        jsonText.Text += "  \"Yaw\": " + item.PositionRotation.Yaw.ToString().Replace(',', '.') + ",\n";
        jsonText.Text += "  \"Hash\": " + Convert.ToInt32(item.ModelHash, 16) + "\n";
        if (item != result.Placement.Last())
          jsonText.Text += "},\n";
        else
          jsonText.Text += "}";

        j++;
      }

      i++;
    }

    public void ConvertXMLtoCS()
    {
      int i = 1, j = 0, modelhash = 0;
      string x = "", y = "", z = "", pitch = "", roll = "", yaw = "";
      lines = xmlText.Text.Split('\n');

      foreach (String item in lines)
      {
        if (i >= offset && i >= 0 + offset + (34 * j) && i <= 33 + offset + (34 * j))
        {
          if (item.Trim().StartsWith("<ModelHash>"))
          {
            String[] temp = item.Split('>', '<');
            modelhash = Convert.ToInt32(temp[2], 16);
          }
          else if (item.Trim().StartsWith("<X>"))
          {
            String[] temp = item.Split('>', '<');
            x = temp[2];
          }
          else if (item.Trim().StartsWith("<Y>"))
          {
            String[] temp = item.Split('>', '<');
            y = temp[2];
          }
          else if (item.Trim().StartsWith("<Z>"))
          {
            String[] temp = item.Split('>', '<');
            z = temp[2];
          }
          else if (item.Trim().StartsWith("<Pitch>"))
          {
            String[] temp = item.Split('>', '<');
            pitch = temp[2];
          }
          else if (item.Trim().StartsWith("<Roll>"))
          {
            String[] temp = item.Split('>', '<');
            roll = temp[2];
          }
          else if (item.Trim().StartsWith("<Yaw>"))
          {
            String[] temp = item.Split('>', '<');
            yaw = temp[2];

            if (modeCombo.SelectedIndex == 1)
              jsonText.Text += "API.createObject(" + modelhash + ", new Vector3(" + x + ", " + y + ", " + z + "), new Vector3(" + pitch + ", " + roll + ", " + yaw + "));\n";
            else
              jsonText.Text += "API.deleteObject(ply, new Vector3(238.4484f, 221.8519f, 106.0944f), 1234612910);";

            j++;
          }


        }

        i++;
      }
    }

    private void Button_Click(object sender, RoutedEventArgs e)
    {
      if (offsetText.Text == "0")
      {
        MessageBox.Show("Offset muss mindestens 1 sein!");
        return;
      }
      else if (offsetText.Text.Length > 0)
      {
        offset = Convert.ToInt32(offsetText.Text);
        jsonText.Text = "";

        if (modeCombo.SelectedIndex == 0)
          ConvertXMLtoJSON();
        else if (modeCombo.SelectedIndex == 1 || modeCombo.SelectedIndex == 2)
          ConvertXMLtoCS();
      }
      else
      {
        MessageBox.Show("Bitte einen Offset angeben");
        return;
      }
    }
  }
}
