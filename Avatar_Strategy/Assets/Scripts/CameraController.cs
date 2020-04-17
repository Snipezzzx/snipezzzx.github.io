using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CameraController : MonoBehaviour
{
  public Transform CamFocus;
  public Transform CamRotation;
  public GameSettings Settings;

  void Update()
  {
    var moveFB = Input.GetAxis("Vertical");
    var moveLR = Input.GetAxis("Horizontal");
    var tempSpeed = (Input.GetKey(KeyCode.LeftShift) ? Settings.Speed * 1.5f : Settings.Speed);

    CamFocus.transform.Translate(new Vector3(moveLR, 0, moveFB) * Time.deltaTime * tempSpeed);

    if(Input.GetMouseButtonDown(2))
    {
      Cursor.lockState = CursorLockMode.Locked;
      Cursor.visible = false;
    }
    else if (Input.GetMouseButtonUp(2))
    {
      Cursor.lockState = CursorLockMode.None;
      Cursor.visible = true;
    }

    if (Input.GetMouseButton(2))
    {
      var rotateVertical = Input.GetAxis("Mouse Y") * Settings.MouseSensibility;
      var rotateHorizontal = Input.GetAxis("Mouse X") * Settings.MouseSensibility;

      //if (CamRotation.rotation.eulerAngles.x >= 20 && CamRotation.rotation.eulerAngles.x <= 80)
        CamRotation.transform.Rotate(new Vector3(rotateVertical, 0));

      if (CamRotation.rotation.eulerAngles.x <= 20)
        CamRotation.transform.rotation = Quaternion.Euler(new Vector3(20, CamRotation.transform.rotation.eulerAngles.y));
      else if (CamRotation.rotation.eulerAngles.x > 70)
        CamRotation.transform.rotation = Quaternion.Euler(new Vector3(70, CamRotation.transform.rotation.eulerAngles.y));

      CamFocus.transform.Rotate(new Vector3(0, rotateHorizontal));
    }


    var zoom = Input.GetAxis("Mouse ScrollWheel");
    transform.Translate(new Vector3(0, 0, zoom) * 5);

    if (transform.localPosition.z > -8)
      transform.localPosition = new Vector3(0, 0, -8);
    else if(transform.localPosition.z < -30)
      transform.localPosition = new Vector3(0, 0, -30);
  }
}
