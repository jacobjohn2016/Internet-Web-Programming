<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <link rel="stylesheet" type="text/css" href="1.css"></link>
            <body>
                <center>
                    <h2>Time Table MCA SEM 5</h2>
                    <table border="1">
                        <tr>
                            <th>Day</th>
                            <th>9:20 AM - 10:10 AM</th>
                            <th>10:30 AM - 11:20 AM</th>
                            <th>11:20 AM - 12:10 PM</th>
                            <th>1:30 PM - 4:00 PM</th>
                        </tr>
                        <xsl:for-each select="TimeTable/Day">
                            <tr>
                                <td><xsl:value-of select="@id"/></td>
                                <td><xsl:value-of select="_1"/></td>
                                <td><xsl:value-of select="_2"/></td>
                                <td><xsl:value-of select="_3"/></td>
                                <td><xsl:value-of select="_4"/></td>
                            </tr>
                        </xsl:for-each>
                    </table>
                </center>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>