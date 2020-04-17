using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CameraController : MonoBehaviour
{
  public Transform CameraAim;
  public Camera MainCamera;
  public float MouseSensitivity;
  public float ZoomSpeed;

  float rotationX = 0;
  float rotationY = 0;

  float minRotationX = 15;
  float maxRotationX = 75;

  float distance = 60;
  float sensitivityDistance = 50;
  float damping = 5;
  float minFOV = 10;
  float maxFOV = 60;

  // Start is called before the first frame update
  void Start()
  {
    distance = MainCamera.fieldOfView;
  }

  // Update is called once per frame
  void FixedUpdate()
  {
    var moveFB = Input.GetAxis("Vertical");
    var moveLR = Input.GetAxis("Horizontal");
    var zoom = Input.GetAxis("Mouse ScrollWheel");

    transform.Translate(new Vector3(moveLR, 0, moveFB));

    if(Input.GetMouseButton(2))
    {
      rotationX += Input.GetAxis("Mouse Y") * MouseSensitivity * -1;
      rotationX = Mathf.Clamp(rotationX, minRotationX, maxRotationX);
      rotationY += Input.GetAxis("Mouse X") * MouseSensitivity;
      CameraAim.localRotation = Quaternion.Euler(rotationX, 0, 0);
      transform.localRotation = Quaternion.Euler(0, rotationY, 0);
    }

    distance -= Input.GetAxis("Mouse ScrollWheel") * sensitivityDistance;
    distance = Mathf.Clamp(distance, minFOV, maxFOV);
    MainCamera.fieldOfView = Mathf.Lerp(MainCamera.fieldOfView, distance, Time.deltaTime * damping);
  }
}
