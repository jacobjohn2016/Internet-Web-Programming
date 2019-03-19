<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <link rel="stylesheet" type="text/css" href="tablestyle.css"></link>
            <body>
                <center>
                    <h2>Jacob's TimeTable</h2>
                    <table border="2">
                        <tr>
                            <th>Day</th>
                            <th>2:00 PM - 2:50 PM</th>
                            <th>3:00 PM - 3:50 PM</th>
                            <th>4:00 PM - 4:50 PM</th>
                            <th>5:00 PM - 5:50 PM</th>
                            <th>6:00 PM - 6:50 PM</th>
                        </tr>
                        <xsl:for-each select="TimeTable/Day">
                            <tr>
                                <td class="day"><xsl:value-of select="@id"/></td>
                                <xsl:choose>
                                    <xsl:when test="_1='Java Programming' or _1='Internet and Web Programming'">
                                        <td bgcolor="lightyellow">
                                        <xsl:value-of select="_1"/></td>
                                    </xsl:when>
                                    <xsl:otherwise>
                                        <td><xsl:value-of select="_1"/></td>
                                    </xsl:otherwise>
                                </xsl:choose>
                                <xsl:choose>
                                    <xsl:when test="_2='Java Programming' or _2='Internet and Web Programming'">
                                        <td bgcolor="lightyellow">
                                            <xsl:value-of select="_2"/></td>
                                    </xsl:when>
                                    <xsl:otherwise>
                                        <td><xsl:value-of select="_2"/></td>
                                    </xsl:otherwise>
                                </xsl:choose>
                                <xsl:choose>
                                    <xsl:when test="_3='Java Programming' or _3='Internet and Web Programming'">
                                        <td bgcolor="lightyellow">
                                            <xsl:value-of select="_3"/></td>
                                    </xsl:when>
                                    <xsl:otherwise>
                                        <td><xsl:value-of select="_3"/></td>
                                    </xsl:otherwise>
                                </xsl:choose>
                                <xsl:choose>
                                    <xsl:when test="_4='Java Programming' or _4='Internet and Web Programming'">
                                        <td bgcolor="lightyellow">
                                            <xsl:value-of select="_4"/></td>
                                    </xsl:when>
                                    <xsl:otherwise>
                                        <td><xsl:value-of select="_4"/></td>
                                    </xsl:otherwise>
                                </xsl:choose>
                                <xsl:choose>
                                    <xsl:when test="_5='Java Programming' or _5='Internet and Web Programming'">
                                        <td bgcolor="lightyellow">
                                            <xsl:value-of select="_5"/></td>
                                    </xsl:when>
                                    <xsl:otherwise>
                                        <td><xsl:value-of select="_5"/></td>
                                    </xsl:otherwise>
                                </xsl:choose>
                            </tr>
                        </xsl:for-each>
                    </table>
                </center>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>