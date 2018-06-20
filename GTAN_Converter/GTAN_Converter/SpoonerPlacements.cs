using System.Collections.Generic;
using System.Xml.Serialization;

namespace GTAN_Converter
{
  [XmlRoot]
  public class SpoonerPlacements
  {
    [XmlElement("Placement")]
    public List<Placement> Placement;
  }
}
