using System.Xml.Serialization;

namespace GTAN_Converter
{
  public class Placement
  {
    [XmlElement("ModelHash")]
    public string ModelHash;
    [XmlElement("PositionRotation")]
    public PositionRotation PositionRotation;
  }
}
