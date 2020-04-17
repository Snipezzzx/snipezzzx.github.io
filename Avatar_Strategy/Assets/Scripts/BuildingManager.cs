using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using UnityEngine;

public class BuildingManager : MonoBehaviour
{
  [Serializable]
  public struct Prefab
  {
    public string Name;
    public GameObject PrefabObject;
  }

  public Prefab[] Prefabs;
  public bool IsPlacing;
  public GameObject Building;

  void FixedUpdate()
  {
    if (IsPlacing)
    {
      int layerMask = 1 << 9;

      Ray ray = Camera.main.ScreenPointToRay(Input.mousePosition);

      if (Physics.Raycast(ray, out RaycastHit hit, Mathf.Infinity, layerMask))
      {
        Building.transform.position = new Vector3(hit.point.x, Building.transform.localScale.y / 2, hit.point.z);
      }
    }

    if (Input.GetMouseButton(0) && IsPlacing)
    {
      IsPlacing = false;
      Building = null;
    }
  }

  public void SpawnPrefab(string prefabName)
  {
    Ray ray = Camera.main.ScreenPointToRay(Input.mousePosition);

    if (Physics.Raycast(ray, out RaycastHit hit))
    {
      Building = Instantiate(Prefabs.First(x => x.Name == prefabName).PrefabObject, hit.point, Quaternion.identity);
      IsPlacing = true;
    }

  }
}
