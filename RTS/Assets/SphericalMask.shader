// Upgrade NOTE: replaced 'mul(UNITY_MATRIX_MVP,*)' with 'UnityObjectToClipPos(*)'

// Upgrade NOTE: replaced 'mul(UNITY_MATRIX_MVP,*)' with 'UnityObjectToClipPos(*)'

Shader "Custom/SphericalMaskDissolve" {
  Properties
  {
    _Color("Color", Color) = (1,1,1,1)
    _MainTex("Albedo (RGB)", 2D) = "white" {}
    _Glossiness("Smoothness", Range(0,1)) = 0.5
    _Metallic("Metallic", Range(0,1)) = 0.0
    [HDR]_Emission("Emission", Color) = (1,1,1,1)
    _NoiseSize("Noise size", float) = 1
    _SrcBlend("SrcBlend", Int) = 5.0 // SrcAlpha
    _DstBlend("DstBlend", Int) = 10.0 // OneMinusSrcAlpha
    _ZWrite("ZWrite", Int) = 1.0 // On
    _ZTest("ZTest", Int) = 4.0 // LEqual
    _Cull("Cull", Int) = 0.0 // Off
    _ZBias("ZBias", Float) = 0.0
  }

    SubShader
  {
    Tags { "Queue" = "Transparent" "IgnoreProjector" = "True" "RenderType" = "Transparent" }
      Blend[_SrcBlend][_DstBlend]
      ZWrite[_ZWrite]
      ZTest[_ZTest]
      Offset[_ZBias],[_ZBias]
      Cull off
      LOD 200

      CGPROGRAM
// Upgrade NOTE: excluded shader from DX11; has structs without semantics (struct appdata_t members normal)
#pragma exclude_renderers d3d11
      #pragma surface surf Standard addshadow vertex:vert
      #include "UnityCG.cginc"
      sampler2D _MainTex;

      struct Input {
        float2 uv_MainTex;
        float3 worldPos;
      };

      half _Glossiness;
      half _Metallic;
      fixed4 _Color;

      fixed4 _Emission;
      float _NoiseSize;

      float3 _GLOBALMaskPosition;
      half _GLOBALMaskRadius;
      half _GLOBALMaskSoftness;

      // Add instancing support for this shader. You need to check 'Enable Instancing' on materials that use the shader.
      // See https://docs.unity3d.com/Manual/GPUInstancing.html for more information about instancing.
      // #pragma instancing_options assumeuniformscaling
      UNITY_INSTANCING_BUFFER_START(Props)
      // put more per-instance properties here
      UNITY_INSTANCING_BUFFER_END(Props)

      float random(float2 input) {
        return frac(sin(dot(input, float2(12.9898, 78.233)))* 43758.5453123);
      }

      void surf(Input IN, inout SurfaceOutputStandard o) {
        fixed4 c = tex2D(_MainTex, IN.uv_MainTex) * _Color;
        half dist = distance(_GLOBALMaskPosition, IN.worldPos);
        half sphere = 1 - saturate((dist - _GLOBALMaskRadius) / _GLOBALMaskSoftness);
        clip(sphere - 0.1);
        float squares = step(0.5, random(floor(IN.uv_MainTex * _NoiseSize)));
        half emissionRing = step(sphere - 0.1, 0.1) * squares;
        o.Emission = _Emission * emissionRing;
        o.Albedo = c.rgb;
        o.Metallic = _Metallic;
        o.Smoothness = _Glossiness;
        o.Alpha = c.a;
      }

      

      struct appdata_t {
        float4 vertex : POSITION;
        float4 color : COLOR;
        float3 normal : TEXCOORD3;
      };
      struct v2f {
        fixed4 color : COLOR;
        float4 vertex : SV_POSITION;
      }; 
      
      //void vert(inout appdata_full v, out Input o) {
      //  o.vertex = UnityObjectToClipPos(v.vertex);
      //  o.color = v.color * _Color;
      //  //return o;
      //}
      v2f vert(inout appdata_t v)
      {
        v2f o;
        o.vertex = UnityObjectToClipPos(v.vertex);
        o.color = v.color * _Color;
        return o;
      }
      fixed4 frag(v2f i) : SV_Target
      {
        return i.color;
      }
      ENDCG
  }
    FallBack "Diffuse"
}