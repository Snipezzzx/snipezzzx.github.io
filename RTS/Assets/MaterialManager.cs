using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MaterialManager : MonoBehaviour
{
  public Material BadMaterial;
  public MeshRenderer Mesh;

  private Material oldMaterial;

  // Start is called before the first frame update
  void Start()
  {
    oldMaterial = Mesh.material;
  }

  // Update is called once per frame
  void FixedUpdate()
  {

  }

  private void OnCollisionEnter(Collision collision)
  {
    Mesh.material = BadMaterial;
  }

  private void OnCollisionExit(Collision collision)
  {
    Mesh.material = oldMaterial;
  }
}
