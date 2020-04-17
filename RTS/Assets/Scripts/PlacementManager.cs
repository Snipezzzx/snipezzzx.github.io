using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using UnityEngine;

[Serializable]
public struct PrefabObject
{
  public string Name;
  public GameObject Prefab;
}

public class PlacementManager : MonoBehaviour
{
  public Camera MainCamera;
  public PrefabObject[] PrefabList;
  public GridOverlay PlacementGrid;
  
  private GameObject currObject;

  // Start is called before the first frame update
  void Start()
  {

  }

  // Update is called once per frame
  void FixedUpdate()
  {
    Ray ray = MainCamera.ScreenPointToRay(Input.mousePosition);

    if (currObject != null && Physics.Raycast(ray, out RaycastHit hit, 1 << 9))
    {
      currObject.transform.position = new Vector3(Mathf.Round(hit.point.x), currObject.transform.localScale.y / 2, Mathf.Round(hit.point.z));

      if (Input.GetMouseButton(0))
        currObject = null;
    }
  }

  public void PlaceCube()
  {
    var currPrefab = PrefabList.FirstOrDefault(x => x.Name == "Cube").Prefab;
    currObject = Instantiate(currPrefab, new Vector3(0, 0, 0), Quaternion.Euler(0, 0, 0));
  }
}
