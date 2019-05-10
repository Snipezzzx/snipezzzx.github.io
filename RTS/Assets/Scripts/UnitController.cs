using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.AI;

public class UnitController : MonoBehaviour
{
  public Camera Cam;
  public NavMeshAgent Agent;
  public bool IsSelected;

  // Update is called once per frame
  void Update()
  {
    if (IsSelected)
    {
      if (Input.GetMouseButtonDown(1))
      {
        Ray ray = Cam.ScreenPointToRay(Input.mousePosition);

        if (Physics.Raycast(ray, out RaycastHit hit))
        {
          Agent.SetDestination(hit.point);
        }
      }
    }
  }
}
