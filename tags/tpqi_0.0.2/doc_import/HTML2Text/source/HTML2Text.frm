VERSION 5.00
Object = "{48E59290-9880-11CF-9754-00AA00C00908}#1.0#0"; "MSINET.OCX"
Object = "{831FDD16-0C5C-11D2-A9FC-0000F8754DA1}#2.0#0"; "MSCOMCTL.OCX"
Begin VB.Form MainWindow 
   BorderStyle     =   1  'Fixed Single
   Caption         =   "HTML to Text converter"
   ClientHeight    =   8055
   ClientLeft      =   45
   ClientTop       =   330
   ClientWidth     =   10890
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MinButton       =   0   'False
   ScaleHeight     =   8055
   ScaleWidth      =   10890
   Begin VB.CheckBox ProxyCheck 
      Caption         =   "Proxy"
      Height          =   375
      Left            =   9600
      TabIndex        =   9
      Top             =   7680
      Width           =   1215
   End
   Begin VB.TextBox ProxyText 
      Height          =   285
      Left            =   5400
      TabIndex        =   8
      Top             =   7680
      Width           =   4095
   End
   Begin VB.TextBox SaveAsTextBox 
      Height          =   285
      Left            =   5400
      TabIndex        =   6
      Top             =   7320
      Width           =   4095
   End
   Begin VB.CheckBox SaveAs 
      Caption         =   "Save File"
      Height          =   255
      Left            =   9600
      TabIndex        =   5
      Top             =   7320
      Width           =   1215
   End
   Begin MSComctlLib.ProgressBar ProgressBar 
      Height          =   255
      Left            =   120
      TabIndex        =   4
      Top             =   7320
      Width           =   3615
      _ExtentX        =   6376
      _ExtentY        =   450
      _Version        =   393216
      Appearance      =   1
   End
   Begin VB.TextBox URLTextBox 
      Height          =   285
      Left            =   600
      TabIndex        =   2
      Text            =   "www.yahoo.com"
      Top             =   6930
      Width           =   8895
   End
   Begin InetCtlsObjects.Inet Inet 
      Left            =   0
      Top             =   0
      _ExtentX        =   1005
      _ExtentY        =   1005
      _Version        =   393216
      AccessType      =   1
      Protocol        =   4
      URL             =   "http://"
   End
   Begin VB.CommandButton ConvertButton 
      Caption         =   "Covert to text"
      Height          =   255
      Left            =   9600
      TabIndex        =   1
      Top             =   6960
      Width           =   1215
   End
   Begin VB.TextBox WebTextBox 
      Height          =   6855
      Left            =   0
      MultiLine       =   -1  'True
      ScrollBars      =   2  'Vertical
      TabIndex        =   0
      Text            =   "HTML2Text.frx":0000
      Top             =   0
      Width           =   10935
   End
   Begin VB.Label ProxyLabel 
      Caption         =   "Proxy Address >"
      Height          =   375
      Left            =   3840
      TabIndex        =   10
      Top             =   7680
      Width           =   1455
   End
   Begin VB.Label SaveAsText 
      Caption         =   "Folder to save in to >"
      Height          =   255
      Left            =   3840
      TabIndex        =   7
      Top             =   7320
      Width           =   1575
   End
   Begin VB.Label URL 
      Caption         =   "URL >"
      Height          =   255
      Left            =   0
      TabIndex        =   3
      Top             =   6960
      Width           =   495
   End
End
Attribute VB_Name = "MainWindow"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim sWebPage As String
Dim sPageText As String
Dim sWebURL As String
Dim sProxySetting As String
Dim dProxyEnabled


    
Private Sub ConvertButton_Click()
    MainWindow.ConvertButton.Enabled = False
    MainWindow.Caption = "HTML to Text converter -- Please wait!  Coverstion in progress..."
    
    'Get the URL
    sWebURL = MainWindow.URLTextBox.Text
    
    'Enable Proxy
    If MainWindow.ProxyCheck.Value = 1 Then
        MainWindow.Inet.Proxy = MainWindow.ProxyText.Text
    End If
    
    'Load the webpage in to sWebPage
    sWebPage = Inet.OpenURL(sWebURL)
    Do Until Inet.StillExecuting = False
        DoEvents
    Loop
    
    'Show the HTML Version
    MainWindow.WebTextBox.Text = sWebPage
    
    'Remove the HTML code / save file
    If MainWindow.SaveAs.Value = 0 Then
        sPageText = HTML2Text(sWebPage)
    Else
        sPageText = HTML2Text(sWebPage, MainWindow.SaveAsTextBox.Text + sWebURL + ".txt")
    End If
    
    'Show the Text version
    MainWindow.WebTextBox.Text = sPageText
    
    MainWindow.ProgressBar.Value = 0
    MainWindow.ConvertButton.Enabled = True
    MainWindow.Caption = "HTML to Text converter"
End Sub

Private Sub Form_Load()
        MainWindow.SaveAsTextBox.Enabled = False
        MainWindow.ProxyText.Enabled = False
        
        'Read ProxyServer from reg
        Call fReadValue("HKCU", "Software\Microsoft\Windows\CurrentVersion\Internet Settings", "ProxyServer", "S", "No Proxy Settings Found..", sProxySetting)
        
        'Read ProxyEnabled from reg
        Call fReadValue("HKCU", "Software\Microsoft\Windows\CurrentVersion\Internet Settings", "ProxyEnable", "D", 0, dProxyEnabled)
        MainWindow.ProxyCheck.Value = dProxyEnabled
        
        If sProxySetting <> "No Proxy Settings Found.." Then
            'Find just the http= part of the ProxySever Key
            sProxySetting = Mid(sProxySetting, InStr(1, sProxySetting, "http=") + 5, InStr(1, Mid(sProxySetting, InStr(1, sProxySetting, "http=") + 5), ":") - 1)
        End If
        
        'Insert Proxy in to porxy text box
        MainWindow.ProxyText.Text = sProxySetting
End Sub

Private Sub SaveAs_Click()
    If MainWindow.SaveAs.Value = 0 Then
        MainWindow.SaveAsTextBox.Enabled = False
    End If
    
    If MainWindow.SaveAs.Value = 1 Then
        MainWindow.SaveAsTextBox.Enabled = True
    End If
End Sub

Private Sub ProxyCheck_Click()
    If MainWindow.ProxyCheck.Value = 0 Then
        MainWindow.ProxyText.Enabled = False
        MainWindow.Inet.AccessType = icDirect
    End If
    
    If MainWindow.ProxyCheck.Value = 1 Then
        MainWindow.ProxyText.Enabled = True
        MainWindow.Inet.AccessType = icNamedProxy
    End If
End Sub

Private Sub URLTextBox_KeyPress(KeyAscii As Integer)
    If KeyAscii = "13" Then
        MainWindow.ConvertButton.SetFocus
        SendKeys (" ")
    End If
End Sub
