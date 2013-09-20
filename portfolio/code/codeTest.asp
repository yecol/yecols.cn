<%@ LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<title>檐·集&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yecols.cn</title>
   <link rel="shortcut icon" href="../images/favicon.ico" />



<script type="text/javascript" src="scripts/shCore.js"></script>
	<script type="text/javascript" src="scripts/shBrushBash.js"></script>
	<script type="text/javascript" src="scripts/shBrushCpp.js"></script>
	<script type="text/javascript" src="scripts/shBrushCSharp.js"></script>
	<script type="text/javascript" src="scripts/shBrushCss.js"></script>
	<script type="text/javascript" src="scripts/shBrushDelphi.js"></script>
	<script type="text/javascript" src="scripts/shBrushDiff.js"></script>
	<script type="text/javascript" src="scripts/shBrushGroovy.js"></script>
	<script type="text/javascript" src="scripts/shBrushJava.js"></script>
	<script type="text/javascript" src="scripts/shBrushJScript.js"></script>
	<script type="text/javascript" src="scripts/shBrushPhp.js"></script>
	<script type="text/javascript" src="scripts/shBrushPlain.js"></script>
	<script type="text/javascript" src="scripts/shBrushPython.js"></script>
	<script type="text/javascript" src="scripts/shBrushRuby.js"></script>
	<script type="text/javascript" src="scripts/shBrushScala.js"></script>
	<script type="text/javascript" src="scripts/shBrushSql.js"></script>
	<script type="text/javascript" src="scripts/shBrushVb.js"></script>
	<script type="text/javascript" src="scripts/shBrushXml.js"></script>
	<link type="text/css" rel="stylesheet" href="styles/shCore.css"/>
	<link type="text/css" rel="stylesheet" href="styles/shThemeDefault.css"/>
	<script type="text/javascript">
		
		SyntaxHighlighter.all();
	</script>
    <link href="code.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="nav"><table id="tableid" border="0">
<tr><td height="10"><a href="http://yecols.cn" title="首页">Index</a></td><td class="paddingtd" id="tdIndex">
<td><a href="http://yecols.cn/photos" title="摄影">Photos</a></td><td class="paddingtd" id="tdPhotos">
<td><a href="http://yecols.cn/portfolio" title="作业集"><span class="navnow">Portfolio</span></a></td>
<td class="paddingtd" id="tdPortfolio">
<td><a href="http://yecols.cn/blog" title="博客">Blog</a></td><td class="paddingtd" id="tdBlog">
<td><a href="http://yecols.cn/lab" title="试验">Lab</a></td><td class="paddingtd" id="tdLab">
<td><a href="http://yecols.cn/guestbook" title="留言">Guestbook</a></td><td class="paddingtd" id="tdGuestbook">
<td><a href="http://yecols.cn/about" title="关于">About</a></td>
</tr></table></div>
<div id="wholePage">
  
  <div id="divAll">
    <div id="divPage">
      <div id="divMiddle">
    <pre class="brush: java;">



import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class DollarConverterGUI extends JPanel implements ActionListener {
	JButton buttonConvert;
	JTextField textFieldDollars;
	JTextField textFieldEuros;
	DollarConverter converter;
	
	public DollarConverterGUI() {
		converter = new DollarConverter();
		buttonConvert = new JButton("Dollars -> Euros");
		textFieldDollars = new JTextField(15);
		textFieldEuros = new JTextField(15);
		
		add(new JLabel("Dollars: "));
		add(textFieldDollars);
		add(new JLabel("to Euros: "));
		add(textFieldEuros);
		textFieldEuros.setEditable(false);
		add(buttonConvert);
		buttonConvert.addActionListener(this);
	}
	
	public void actionPerformed(ActionEvent e) {
		if(e.getSource() == buttonConvert) {
			try {
				converter.setDollars(Double.parseDouble(textFieldDollars.getText()));
				textFieldEuros.setText(new Double(converter.getEuros()).toString());
			}
			catch (NegativeNumberException n) {
				JOptionPane.showMessageDialog(null, "Please enter a 'positive' number", "Invalid value", JOptionPane.ERROR_MESSAGE);
			}
			catch (NumberFormatException n) {
				JOptionPane.showMessageDialog(null, "Please enter a 'positive number'", "Invalid value", JOptionPane.ERROR_MESSAGE);
			}
		}
	}
	
	public static void main(String[] args) {
		JFrame frame = new JFrame("Dollars to Euros");
		frame.add(new DollarConverterGUI());
		frame.setSize(700, 100);
		frame.setVisible(true);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	}
}
</pre>
 
 


  </div>
</div>

</body>
</html>