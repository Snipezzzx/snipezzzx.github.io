using System.Xml.Serialization;

namespace GTAN_Converter
{
  public class PositionRotation
  {
    [XmlElement("X")]
    public double X;
    [XmlElement("Y")]
    public double Y;
    [XmlElement("Z")]
    public double Z;
    [XmlElement("Pitch")]
    public double Pitch;
    [XmlElement("Roll")]
    public double Roll;
    [XmlElement("Yaw")]
    public double Yaw;
  }
}
