<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <link rel="stylesheet" type="text/css" href="stylesheet.css"></link>
            <body>
                <h2>Property and Values</h2>
                <table>
                    <tr>
                        <th>Property ID</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Owner ID</th>
                    </tr>
                    <xsl:for-each select="Property/Prop">
                        <tr>
                            <xsl:choose>
                                <xsl:when test="Value>2500000">
                                    <td>
                                        <xsl:value-of select="@id" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="Name" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="Value" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="owner-id" />
                                    </td>
                                </xsl:when>
                                <xsl:otherwise></xsl:otherwise>
                            </xsl:choose>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>