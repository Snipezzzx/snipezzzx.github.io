using System;
using System.Collections.Generic;
using UnityEngine;

public class StorageController : MonoBehaviour
{
  public enum ResourceType
  {
    Coal,
    Wood,
    Food,
    Water,
    Stone
  }
  
  public Transform StorageContainer;

  Dictionary<ResourceType, int> _stockpile = new Dictionary<ResourceType, int>();

  // Start is called before the first frame update
  void Start()
  {

  }

  // Update is called once per frame
  void Update()
  {

  }

  public int GetResourceStock(ResourceType kind)
  {
    int held = 0;
    _stockpile.TryGetValue(kind, out held);
    return held;
  }

  public void AddResource(ResourceType kind, int quantity)
  {
    // For safety & debugging, you may want to Assert here that quantity > 0.
    int held = GetResourceStock(kind);
    float oldCount = Mathf.Ceil(held / 50);
    _stockpile[kind] = held + quantity;

    float newCount = Mathf.Ceil(_stockpile[kind]);

    while (oldCount < newCount)
    {
      
    }
  }

  public bool TryWithdrawResource(ResourceType kind, int quantity)
  {
    int held = GetResourceStock(kind);
    if (held < quantity)
      return false; // I lack enough funds to spend.

    _stockpile[kind] = held - quantity;
    return true;      // Transaction completed successfully.
  }
}
