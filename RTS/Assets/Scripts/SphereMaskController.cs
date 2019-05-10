using UnityEngine;

[ExecuteInEditMode]
public class SphereMaskController : MonoBehaviour
{
  public float radius = 0.5f;
  public float softness = 0.5f;

  public Camera MainCamera;

  private void Start()
  {
    MainCamera = GetComponent<Camera>();
  }

  void Update()
  {
    Ray ray = MainCamera.ScreenPointToRay(Input.mousePosition);
    Physics.Raycast(ray, out RaycastHit hit);

    Shader.SetGlobalVector("_GLOBALMaskPosition", hit.point);
    Shader.SetGlobalFloat("_GLOBALMaskRadius", radius);
    Shader.SetGlobalFloat("_GLOBALMaskSoftness", softness);
  }
}