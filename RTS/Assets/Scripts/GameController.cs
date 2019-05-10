using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GameController : MonoBehaviour
{
  public Camera MainCamera;
  public List<UnitController> SelectedUnits;

  // Start is called before the first frame update
  void Start()
  {

  }

  // Update is called once per frame
  void FixedUpdate()
  {
    Ray ray = MainCamera.ScreenPointToRay(Input.mousePosition);

    if (Physics.Raycast(ray, out RaycastHit hit))
    {
      if (Input.GetMouseButton(0))
      {
        // Unselect previous units
        SelectedUnits.ForEach(x => x.IsSelected = false);
        SelectedUnits.Clear();

        if (hit.transform.tag == "Unit")
        {
          Transform objectHit = hit.transform;
          UnitController unitHit = objectHit.GetComponent<UnitController>();

          // Select unit
          unitHit.IsSelected = true;
          SelectedUnits.Add(unitHit);
        }
      }
    }
  }
}
